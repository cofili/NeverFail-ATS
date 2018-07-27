from datetime import datetime
import time
import json
from random import randint


# specify global for amount of time we want the test to take
maxSeconds = 3

# defining main
def main():
    try :
        # get start time
        startTime = datetime.utcnow()

        # returns true unless we don't have a list of proper size
        success = run()

        # get end time
        endTime = datetime.utcnow()

        # get the difference between start and end time
        diff = (endTime - startTime).seconds

        # if it took longer than we wanted to we failed
        if(diff > maxSeconds):
            # package up the failure and return it
            success = False
            run_message = "ERROR:Storage_test_exceeds_time_boundary"
            #result = toJsonObject(run_message)

            print(run_message)

            #return result
    # if some error happened in execution of test we fail and end up here
    except Exception as e:
        # package up failure and return it
        run_message = "ERROR: " + str(e)
        success = False
        #result = toJsonObject(run_message)

    except MemoryError:
        print("ERROR") 
        print("MemoryError....The_operation_ran_out_of_memory")
        sys.exit(0)
        
        
    except Exception:
        print("ERROR")
        print("Exception_handling_caught_an_error")
        sys.exit(0)

        print(run_message)

        #return result

    # check that we didn't fail the test and modify the run_message accordingly
    if (success == True):
        run_message = "SUCCESS"
    else:
        run_message = "error_in_IntegerMathTest.py"
    # package up the success or fail and return it
    log(run_message)
    print(run_message)
    #result = toJsonObject(run_message)

    #return result

# this is the actual test being run, just makes a large list and we make sure the size is what we specified
def run() :
    add_result = addition()
    subtraction_result = subtraction()
    multiplication_result = multiplication()
    division_result = division()
    if (add_result == False):
        print('AdditionError')
        exit()
    if (add_result == False):
        print('SubtractionError')
        exit()
    if (multiplication_result == False):
        print('MultiplicationError')
        exit()
    if (division_result == False):
        print('DivisionError')
        exit()
    else:
        return True

def addition() :
    # Would be more effectively done using an object but this works for now
    for i in range(0, 9):
        if (i == 0):
            expSum = 0
        if (i == 1):
            expSum = 2
        if (i == 2):
            expSum = 4
        if (i == 3):
            expSum = 6
        if (i == 4):
            expSum = 8
        if (i == 5):
            expSum = 10
        if (i == 6):
            expSum = 12
        if (i == 7):
            expSum = 14
        if (i == 8):
            expSum = 16
        if (i == 9):
            expSum = 18

        for k in range(1000000):
            actSum = i+i
            if (actSum != expSum):
                return False
    return True

def subtraction() :
    # Would be more effectively done using an object but this works for now
    for i in range(0, 9):
        # Anything minus itself equals zero 
        expDiff = 0

        for k in range(1000000):
            actDiff = i-i
            if (actDiff != expDiff):
                return False
    return True

def multiplication() :
    # Would be more effectively done using an object but this works for now
    for i in range(0, 9):
        if (i == 0):
            expProd = 0
        if (i == 1):
            expProd = 1
        if (i == 2):
            expProd = 4
        if (i == 3):
            expProd = 9
        if (i == 4):
            expProd = 16
        if (i == 5):
            expProd = 25
        if (i == 6):
            expProd = 36
        if (i == 7):
            expProd = 49
        if (i == 8):
            expProd = 64
        if (i == 9):
            expProd = 81

        for k in range(1000000):
            actProd = i*i
            if (actProd != expProd):
                return False
    return True

def division():
    # Would be more effectively done using an object but this works for now
    for i in range(0, 9):
        # Anything divided by itself equals 1
        expQuot = 1

        for k in range(1000000):
            if (i != 0):
                actQuot = i/i
                if (actQuot != expQuot):
                    return False
            elif(i == 0):
                try:
                    actQuot = i/i
                    # supposed to be "Error: division by zero
                    if (actQuot == expQuot):
                        return False
                except Exception as e:
                    if (e == "division_by_zero"):
                        print("we_did_it")
                        return True
                    
                    
    return True

# turns stuff into JSON Object
def toJsonObject(run_message):
    toBeJson = {'Message' : run_message}
    jsonObj = json.dumps(toBeJson)
    return jsonObj

def log(run_message):
    with open("error_log.log", "a") as myfile:
        test_name = "IntegerMathTest"
        log_message = "{} | {} | {} \n".format(datetime.utcnow(),test_name, run_message)
        myfile.write(log_message)
        
main()
