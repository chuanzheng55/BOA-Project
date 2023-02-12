import spacy
from sklearn.metrics import accuracy_score
from sklearn.svm import LinearSVC

# Define the categories
categories = ['network', 'hardware', 'software', 'security']

# Load the IT incident ticket dataset
train_data = ["Cannot connect to the network", "Printer not working", "Application crashes on startup", "Unauthorized access detected"]
train_labels = ['network', 'hardware', 'software', 'security']

test_data = ["Network down in the morning", "Laptop keyboard not working", "Outlook not responding", "Potential phishing email"]
test_labels = ['network', 'hardware', 'software', 'security']

# Load spaCy's language model
nlp = spacy.load('en_core_web_sm')

# Create the training data
train_vectors = [nlp(text).vector for text in train_data]

# Train a classifier using the training data
clf = LinearSVC()
clf.fit(train_vectors, train_labels)

# Test the classifier on the test data
test_vectors = [nlp(text).vector for text in test_data]
predicted = clf.predict(test_vectors)

# Print the accuracy of the classifier
print(test_data, test_labels,"result:", predicted)
print(accuracy_score(test_labels, predicted))
