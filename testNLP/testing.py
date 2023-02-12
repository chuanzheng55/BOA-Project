import spacy
from spacy.pipeline import TextCategorizer
import pandas as pd
import openpyxl

df = pd.read_excel('TicketDataSheet.xlsx')
user_description = df[df.columns[13]].tolist()  # extracted the column from the datasheet using panda into array
event_type = df[df.columns[6]].tolist()
Category = df[df.columns[7]].tolist()

nlp = spacy.load("model_directory")

# for x in user_description:
#     test = x
test = "Application is crashed"
doc = nlp(test)
data = doc.cats

print(doc.cats)
print((test,max(data,key=data.get)))