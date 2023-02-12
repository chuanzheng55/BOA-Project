import spacy
from spacy.matcher import Matcher

nlp = spacy.load("en_core_web_sm")
matcher = Matcher(nlp.vocab)

# Define the categories
categories = ["network", "storage", "access", "application", "web server", "hardware", "operating system", "system"]

examples = []

with open('example.txt') as myfile:
    for line in myfile:
        entry = line.rstrip().split(",")
        examples.append(entry)


# Train the model
for text, label in examples:
    doc = nlp(text)
    for token in doc:
        matcher.add(label, [[{"LOWER": token.text}]])


# def classify_sentence(sentence):
#     # # Define the patterns for each category
#     # network_patterns = [
#     #     [{"LOWER": "internet"}, {"LOWER": "slow"}],
#     #     [{"LOWER": "dns"}, {"LOWER": "server"}],
#     #     [{"LOWER": "ip"}, {"LOWER": "address"}],
#     #     [{"LOWER": "tcp"}, {"LOWER": "connection"}],
#     #     [{"LOWER": "unreliable"}, {"LOWER": "connections"}],
#     #     [{"LOWER": "network"}, {"LOWER": "device"}],
#     #     [{"LOWER": "router"}],
#     #     [{"LOWER": "modem"}],
#     #     [{"LOWER": "switch"}],
#     #     [{"LOWER": "internet"}]
#     #
#     # ]
#     # storage_patterns = [
#     #     [{"LOWER": "storage"}],
#     #     [{"LOWER": "disk"}, {"LOWER": "space"}],
#     #     [{"LOWER": "disk"}],
#     #     [{"LOWER": "event"}, {"LOWER": "02002"}],
#     #     [{"LOWER": "event"}, {"LOWER": "010105"}],
#     #     [{"LOWER": "error"}, {"LOWER": "1620"}],
#     #     [{"LOWER": "storage"}, {"LOWER": "pool"}],
#     #     [{"LOWER": "error"}, {"LOWER": "2080"}],
#     #
#     # ]
#     # access_patterns = [
#     #     [{"LOWER": "locked"}, {"LOWER": "out"}],
#     #     [{"LOWER": "can't"}, {"LOWER": "access"}],
#     #     [{"LOWER": "login"}],
#     #     [{"LOWER": "permission"}],
#     #     [{"LOWER": "password"}],
#     #     [{"LOWER": "change"}, {"LOWER": "password"}],
#     #     [{"LOWER": "sign"}, {"LOWER": "on"}],
#     #     [{"LOWER": "forgot"}, {"LOWER": "password"}],
#     #     [{"LOWER": "multiple"}, {"LOWER": "attempts"}],
#     # ]
#     #
#     # application_patterns = [
#     #     [{"LOWER": "application"}],
#     #     [{"LOWER": "application"}, {"LOWER": "crashed"}]
#     #
#     # ]
#
#     # # Add the patterns to the matcher
#     # for patterns, category in [(network_patterns, "network"),
#     #                            (storage_patterns, "storage"),
#     #                            (application_patterns, "application"),
#     #                            (access_patterns, "access")]:
#     #     for pattern in patterns:
#     #         matcher.add(category, [pattern])
#
#     # Process the sentence and classify it
#     # doc = nlp(sentence)
#     # matches = matcher(doc)
#     # categories_found = [doc.vocab.strings[match_id] for match_id, start, end in matches]
#     # if categories_found:
#     #     return categories_found[0]
#     # else:
#     #     return "other"

# test the model
def classify_sentence(sentence):
    doc = nlp(sentence)
    matches = matcher(doc)
    categories_found = [doc.vocab.strings[match_id] for match_id, start, end in matches]
    if categories_found:
        return categories_found[0]
    else:
        return "other"


# Test the classify_sentence function
test_sentences = [
    "crashed internet",
    "Wrong IP address",
    "page is loading",
    "server error",
    "system error",
    "screen is not working",
    "internet is slow"
]

for sentence in test_sentences:
    category = classify_sentence(sentence)
    print(f"{sentence} => {category}")
    # with open('example.txt',"r+") as file:
    #     content = file.read()
    #     if sentence in content:
    #         print()
    #     else:
    #         file.write("\n" + sentence+"," + category)