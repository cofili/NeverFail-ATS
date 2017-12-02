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

            print(run_message)

            #return result
    # if some error happened in execution of test we fail and end up here
    except Exception as e:
        # package up failure and return it
        run_message = "ERROR: " + str(e)
        success = False
        #result = toJsonObject(run_message)

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
            i = 0.0
            expSum = 0.0
        if (i == 1):
            i = 1.0
            expSum = 2.0
        if (i == 2):
            i = 2.0
            expSum = 4.0
        if (i == 3):
            i = 3.0
            expSum = 6.0
        if (i == 4):
            i = 4.0
            expSum = 8.0
        if (i == 5):
            i = 5.0
            expSum = 10.0
        if (i == 6):
            i = 6.0
            expSum = 12.0
        if (i == 7):
            i = 7.0
            expSum = 14.0
        if (i == 8):
            i = 8.0
            expSum = 16.0
        if (i == 9):
            i = 9.0
            expSum = 18.0

        for k in range(1000000):
            actSum = i+i
            if (actSum != expSum):
                return False
    return True

def subtraction() :
    # Would be more effectively done using an object but this works for now
    for i in range(0, 9):
        # Anything minus itself equals zero 
        if (i == 0):
            i = 0.0
            expDiff = 0.0
        if (i == 1):
            i = 1.0
            expDiff = 0.0
        if (i == 2):
            i = 2.0
            expDiff = 0.0
        if (i == 3):
            i = 3.0
            expDiff = 0.0
        if (i == 4):
            i = 4.0
            expDiff = 0.0
        if (i == 5):
            i = 5.0
            expDiff = 0.0
        if (i == 6):
            i = 6.0
            expDiff = 0.0
        if (i == 7):
            i = 7.0
            expDiff = 0.0
        if (i == 8):
            i = 8.0
            expDiff = 0.0
        if (i == 9):
            i = 9.0
            expDiff = 0.0

        for k in range(1000000):
            actDiff = i-i
            if (actDiff != expDiff):
                return False
    return True

def multiplication() :
    # Would be more effectively done using an object but this works for now
    for i in range(0, 9):
        if (i == 0):
            i = 0.0
            expProd = 0.0
        if (i == 1):
            i = 1.0
            expProd = 1.0
        if (i == 2):
            i = 2.0
            expProd = 4.0
        if (i == 3):
            i = 3.0
            expProd = 9.0
        if (i == 4):
            i = 4.0
            expProd = 16.0
        if (i == 5):
            i = 5.0
            expProd = 25.0
        if (i == 6):
            i = 6.0
            expProd = 36.0
        if (i == 7):
            i = 7.0
            expProd = 49.0
        if (i == 8):
            i = 8.0
            expProd = 64.0
        if (i == 9):
            i = 9.0
            expProd = 81.0
        for k in range(1000000):
            actProd = i*i
            if (actProd != expProd):
                return False
    return True

def division():
    # Would be more effectively done using an object but this works for now
    for i in range(0, 9):
        # Anything divided by itself equals 1
        if (i == 0):
            i = 0.0
            expQuot = 0.0
        if (i == 1):
            i = 1.0
            expQuot = 0.0
        if (i == 2):
            i = 2.0
            expQuot = 0.0
        if (i == 3):
            i = 3.0
            expQuot = 0.0
        if (i == 4):
            i = 4.0
            expQuot = 0.0
        if (i == 5):
            i = 5.0
            expQuot = 0.0
        if (i == 6):
            i = 6.0
            expQuot = 0.0
        if (i == 7):
            i = 7.0
            expQuot = 0.0
        if (i == 8):
            i = 8.0
            expQuot = 0.0
        if (i == 9):
            i = 9.0
            expQuot = 0.0
        for k in range(1000000):
            if (i != 0.0):
                print("made it in")
                actQuot = i/i
                if (actQuot != expQuot):
                    return False
            elif(i == 0.0):
                try:
                    actQuot = i/i
                    # supposed to be "Error: float division by zero"
                    if (actQuot == expQuot):
                        return False
                except ZeroDivisionError as e:
                    return True
                    
                    
    return True

# turns stuff into JSON Object
def toJsonObject(run_message):
    toBeJson = {'Message' : run_message}
    jsonObj = json.dumps(toBeJson)
    return jsonObj

def log(run_message):
    with open("error_log.log", "a") as myfile:
        test_name = "FloatingPointTest"
        log_message = "{} | {} | {} \n".format(datetime.utcnow(),test_name, run_message)
        myfile.write(log_message)
        
main()