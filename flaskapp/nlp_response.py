import random, string
from textcat_category import event_typeNLP
from solution_data import solution

# Mock_NLP response, just to make sure it is receiving and sending data through flask.
# Will replace after the NLP model is created.

def nlp_output(event_type, user_description, date_created, Category, Subcategory, Severity, Impact,
                             cust_id, contact_type, ticket_duration, Priority, closed_at, Acknowledged, open_by,
                             open_at, assigned_to, assigned_group, administrator_comment, EST_completion,
                             Manufacturer, resolver_description, solution_summary, Request_for_change,
                             reassignment_count,
                             notify, error_id, Status, resolved_by ):
    # result = ''.join(random.choice(string.ascii_letters) for i in range(40))
    if event_type == "":
        event_type = event_typeNLP(user_description)
    if solution_summary == "":
        solution_summary == solution(user_description)
        # result = user_description + event_type
        # resultOut = "Random Solution: " + "NLP solution"
        # print(resultOut)
        # return {
        #    "Status": Status, "event_type": event_type,"user_description": user_description,"date_created": date_created,"Category": Category,"Subcategory": Subcategory,
        #    "Severity": Severity,"Impact": Impact,"cust_id": cust_id,"contact_type": contact_type,"ticket_duration": ticket_duration,
        #    "Priority": Priority,"closed_at": closed_at,"Acknowledged": Acknowledged,"open_by": open_by,
        #    "open_at": open_at,"assigned_to": assigned_to,"assigned_group": assigned_group,"administrator_comment": administrator_comment,
        #    "EST_completion": EST_completion,"Manufacturer":  Manufacturer,"resolver_description": resolver_description,
        #    "solution_summary": resultOut,"Request_for_change": Request_for_change,"reassignment_count": reassignment_count,"notify": notify, "resolved_by":"Auto-generated","error_id":error_id }

    # else:
    return {
       "Status": Status, "event_type": event_type,"user_description": user_description,"date_created": date_created,"Category": Category,"Subcategory": Subcategory,
       "Severity": Severity,"Impact": Impact,"cust_id": cust_id,"contact_type": contact_type,"ticket_duration": ticket_duration,
       "Priority": Priority,"closed_at": closed_at,"Acknowledged": Acknowledged,"open_by": open_by,
       "open_at": open_at,"assigned_to": assigned_to,"assigned_group": assigned_group,"administrator_comment": administrator_comment,
       "EST_completion": EST_completion,"Manufacturer":  Manufacturer,"resolver_description": resolver_description,
       "solution_summary": solution_summary,"Request_for_change": Request_for_change,"reassignment_count": reassignment_count,"notify": notify,  "resolved_by":resolved_by ,"error_id":error_id }
