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
    

        
        
main()