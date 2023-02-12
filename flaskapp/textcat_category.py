import spacy
from spacy.pipeline import TextCategorizer
import pandas as pd
import openpyxl

nlp = spacy.load("model_directory")


def event_typeNLP(user_description):
    doc = nlp(user_description)
    data = doc.cats

    print(user_description)
    print(max(data, key=data.get))

    return max(data, key=data.get)


if __name__ == '__main__':
    event_typeNLP("Application is crashed")
