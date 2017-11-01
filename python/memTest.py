#Tests major subsytem: Memory
#Creates 1MB file with consecutive integers, and loops 5 times. Takes time of execution to analyze memory speed. Tests for error handling, success, and failure scenarios.

def main():
    import os
    import time
    
    
    #SCENARIO 1: SUCCESS
    start_time = time.time()
    list_count = 0
 
    for i in range(5):
        list_count += 1
        list(range(1000000))
        print("List", list_count, "created")

    time_delta = time.time() - start_time
    if time_delta <= 10:             
        print("SUCCESS: Memory is fast. Total time of operation was " + repr(time_delta) + " seconds")
    else:
        print("ERROR: Memory is slow. Total time of operation was " + repr(time_delta) + "seconds")
    

    
    #SCENARIO 2: ERROR - Time Exceeded
    start_time = time.time()
    list_count = 0
    
    for i in range(5):
        list_count += 1
        list(range(1000000))
        time.sleep(2)
        print("List", list_count, "created")
             
    time_delta = time.time() - start_time

    if time_delta <= 10:             
        print("SUCCESS: Memory is fast. Total time of operation was " + repr(time_delta) + " seconds")
    else:
        print("ERROR: Memory is slow. Total time of operation was " + repr(time_delta) + " seconds")
    


    
    #SCENARIO 3: FORCE ERROR HANDLING - Access memory list index out of boundary
    memory_list = list(range(1000000))
    number_list_integers = 0
    for i in range(1000000):
        number_list_integers += 1

    try:
        memory_list[number_list_integers+1]
    except IndexError:
        print("ERROR: List index is out of range.")
    else:
        print("Error handling did not work.")
        
        
main()