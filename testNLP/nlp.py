import spacy
import classy_classification    # didnt have time to train one from scratch   text categorization
import pandas as pd

df = pd.read_excel('TicketDataSheet.xlsx')
user_description = df[df.columns[13]].tolist()  # extracted the column from the datasheet using panda into array
event_type = df[df.columns[6]].tolist()
Category = df[df.columns[7]].tolist()

networkArray = ["Internet is too slow", "Server DNS Address could not be found.", "Failed to obtain IP address",   # manually picked some good data from user description
                "TCP connection timeout/error", "Unreliable connections",
                "Difficulty accessing networked devices through a router",
                "router", "switch", "internet", "modem", "Internet is too slow",
                "Server DNS Address could not be found.",
                "DNS server not responding"
                ]

applicationArray = ["Application crashed", "Application won't start", "Application",
                    "Application Update is taking longer than usual", "Application has gone offline",
                    "Login token has expired. I need token renewed", "Application crashes randomly",
                    "Application gives error sometimes when printing", "File missing for application start",
                    "Application has gone offline", "User has installed unauthorized software onto computer",
                    "Login token has expired. I need token renewed",
                    "Application crashes randomly",
                    "Application gives error sometimes when printing",
                    "Inventory management and fulfillment service non-responsiv",
                    "Web Page Images not loading",
                    "Application crashes",
                    "Trouble signing in to account",
                    "Loading the Wrong page",
                    "Application Update is taking longer than usual"
                    ]

webserverArray = ["Website is down", "Internal server error",
                  "Server Not found",
                  "Internal server error",
                  "Server Not found",
                  "Unauthorized web page, can't access a webpage",
                  "The internet connection is slow causing increased wait times in production",
                  "Could not connect to service"
                  ]

hardwareArray = ["Printer is not connecting to the internet. Cannot print labels or tags",
                 "We are unable to print out any customer credentials from our main printer"
                 ]

accessArray = ["I have been locked out of my account after multiple attempts",
               "Unable to reset password after Leave of abscene return",
               "Need permission to sign on",
               "Need help with changing password",
               "I have been locked out",
               "multiple attempts"
               "forgot password"
               ]

osArray = ["Computer won't turn on",
           "Missing DLL files",
           "OS can't be loaded",
           "Fatal Exception",
           "Shipping workstation's connection not detected",
           "The computer shuts down without warning",
           "Computer crashed",
           "The computer shut down"
           "An application does not install",
           "The computer is running slowly and has a delayed response",
           "Computer boots only to VGA mode"
           ]

storageArray = ["E21121- Disk space is low",
                "Hard disk failure",
                "Volume is dirty",
                "Event 020002 Error 1620 - A storage pool is offline",
                "5038 Code integrity determined that the image hash of a file is not valid",
                "Event 010105 Error 2080 - Storage system connected to unsupported port"
                ]

systemArray = ["Request failed due to fatal device hardware/hard drive error",
               "Fatal system error",
               "Disk Full",
               "0x80070057 windows update error"
               ]

data = {                      # dataset to compare with the model

    "Network": networkArray,

    "Application": applicationArray,

    "Web Server": webserverArray,

    "Hardware": hardwareArray,

    "Access": accessArray,

    "Operating System": osArray,

    "Storage": storageArray,

    "System": systemArray

}

for x in user_description:          # loop through the data
    print(x)
    text = input()

    nlp = spacy.blank("en")      # spacy english model, english words and other meanings

    nlp.add_pipe(                       # add_pipe line
        "text_categorizer",
        config={                        # creating pipeline using config
            "data": data,                   #json dataset
            "model": "sentence-transformers/paraphrase-multilingual-MiniLM-L12-v2",   # sentence transformers with paraphrase model en_core_md
            "device": "gpu"
        }
    )
    doc = nlp(text)
    percent_match = doc._.cats              # getting the score in percentage for matching input with the data

    networkPer = percent_match['Network']             # getting percentage match for each event type
    applicationPer = percent_match['Application']
    webserverPer = percent_match['Web Server']
    hardwarePer = percent_match['Hardware']
    accessPer = percent_match['Access']
    osPer = percent_match['Operating System']
    storagePer = percent_match['Storage']
    systemPer = percent_match['System']

    result = max(networkPer, applicationPer, webserverPer, hardwarePer, accessPer, osPer, storagePer, systemPer)  # finding what is the maxium match
    print(result)
    total = networkPer + applicationPer + webserverPer + hardwarePer + accessPer + osPer + storagePer + systemPer  # total match = 1

# find which one is the maximum match and print its event type
    if total < 0.9:
        print("undecided")
    elif result is applicationPer:
        print("Application")
    elif result is webserverPer:
        print("Web Server")
    elif result is hardwarePer:
        print("Hardware")
    elif result is accessPer:
        print("Access")
    elif result is osPer:
        print("Operating System")
    elif result is storagePer:
        print("Storage")
    elif result is systemPer:
        print("System")
    elif result is networkPer:
        print("Network")
    print()



# data is not very accurate rn, need more data to train the model