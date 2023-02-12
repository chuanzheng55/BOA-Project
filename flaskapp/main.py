from flask import Flask, render_template, request, json
import io
from time import sleep
from nlp_response import nlp_output

app = Flask(__name__)


# GETTING DATA FROM THE FORM
@app.route('/entry', methods=['POST', 'GET'])
def data_entry():
    event_type = request.form['event_type']
    user_description = request.form['user_description']
    date_created = request.form['date_created']
    Category = request.form['Category']
    Subcategory = request.form['Subcategory']
    Severity = request.form['Severity']
    Impact = request.form['Impact']
    cust_id = request.form['cust_id']
    contact_type = request.form['contact_type']
    ticket_duration = request.form['ticket_duration']
    Priority = request.form['Priority']
    closed_at = request.form['closed_at']
    Acknowledged = request.form['Acknowledged']
    open_by = request.form['open_by']
    open_at = request.form['open_at']
    assigned_to = request.form['assigned_to']
    assigned_group = request.form['assigned_group']
    administrator_comment = request.form['administrator_comment']
    EST_completion = request.form['EST_completion']
    Manufacturer = request.form['Manufacturer']
    resolver_description = request.form['resolver_description']
    solution_summary = request.form['solution_summary']
    Request_for_change = request.form['Request_for_change']
    reassignment_count = request.form['reassignment_count']
    notify = request.form['notify']
    error_id = request.form['error_id']
    resolved_by = request.form['resolved_by']
    Status = request.form['Status']

    # SENDING DATA TO MOCK NLP
    json_output = nlp_output(event_type, user_description, date_created, Category, Subcategory, Severity, Impact,
                             cust_id, contact_type, ticket_duration, Priority, closed_at, Acknowledged, open_by,
                             open_at, assigned_to, assigned_group, administrator_comment, EST_completion,
                             Manufacturer, resolver_description, solution_summary, Request_for_change,
                             reassignment_count,
                             notify, error_id, Status, resolved_by
                             )
    # SAVING THE JSON RESPONSE FROM MOCK NLP AS DATA.JSON(TEMPORARY FILE) AS SOON AS THE NEW TICKET IS CREATED IT OVERWRITES THE FILE
    with open('data.json', 'w') as file:
        json.dump(json_output, file)
    return '', 204              # 204 EMPTY RESPONSE

# OUTPUT IS CALLED FROM MOCK_CREATE.PHP, IT CONTAINS AUTO_GENERATED SOLUTION IT SENDS TO MOCK_CREATED.PHP AND THAT PHP WILL ADD THIS TICKET TO DATABASE
@app.route('/output', methods=['GET', 'POST'])
def return_output():
    file = open('data.json')
    json_data = json.load(file)
    response = app.response_class(
        response=json.dumps(json_data),
        status=200,
        mimetype='application/json'
    )
    return response


if __name__ == '__main__':
    app.run(debug=True)
