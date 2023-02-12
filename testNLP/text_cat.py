import random
import spacy
from spacy.training import Example
from thinc.api import Config
from spacy.util import minibatch, compounding
from spacy.pipeline.textcat_multilabel import DEFAULT_MULTI_TEXTCAT_MODEL
from spacy.pipeline import TextCategorizer

# config = {
#    "threshold": 0.5,
#    "model": DEFAULT_MULTI_TEXTCAT_MODEL,
# }

# Load the pre-trained model
nlp = spacy.blank("en")

multi_label_bow_config = """
[model]
@architectures = "spacy.TextCatBOW.v2"
exclusive_classes = true
ngram_size = 1
no_output_layer = false
"""

config = Config().from_str(multi_label_bow_config)

# # Define the labels
# LABELS = ["network", "application", "hardware", "access"]
textcat = nlp.add_pipe("textcat_multilabel", config=config)

textcat.add_label('network')
textcat.add_label('application')
textcat.add_label('hardware')
textcat.add_label('access')

# Create the training data
TRAIN_DATA = [
    ("Cannot connect to the network", {"network": 1, "application": 0, "hardware": 0, "access": 0}),
    ("Application is crashed", {"network": 0, "application": 1, "hardware": 0, "access": 0}),
    ("Internet is really slow", {"network": 1, "application": 0, "hardware": 0, "access": 0}),
    ("printer is not working", {"network": 0, "application": 0, "hardware": 1, "access": 0}),
    ("I am not able to access my account", {"network": 0, "application": 0, "hardware": 0, "access": 1}),
]


# Define the textcat component


# Add the labels to the textcat component

# textcat.add_label("label0")
# textcat.add_label("label1")
# textcat.add_label("label2")
# textcat.add_label("label3")

# Define a function to preprocess the text data
def preprocess(text):
    # Lowercase the text
    text = text.lower()
    # Remove punctuation and special characters
    text = "".join(c for c in text if c.isalnum() or c.isspace())
    # Remove extra whitespace
    text = " ".join(text.strip().split())
    return text


# Preprocess the training data
TRAIN_DATA = [(preprocess(text), entities) for text, entities in TRAIN_DATA]

# Start the training
optimizer = nlp.begin_training()

for itn in range(1000):
    random.shuffle(TRAIN_DATA)
    losses = {}

    for batch in spacy.util.minibatch(TRAIN_DATA, size=8):
        texts = [nlp.make_doc(text) for text, entities in batch]
        annotations = [{"cats": entities} for text, entities in batch]

        examples = [Example.from_dict(doc, annotation) for doc, annotation in zip(
            texts, annotations
        )]
        nlp.update(examples, losses=losses)
        # print(texts,annotations)
        doc = nlp(texts[0])
        print(texts, doc.cats)

# Save the model to disk
nlp.to_disk("model_directory")

# Load the model from disk
loaded_nlp = spacy.load("model_directory")
