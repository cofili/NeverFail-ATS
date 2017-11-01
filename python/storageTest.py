#Tests major subsytem: Storage
#Creates 2mb files filled with consecutive integers. Each file is created (overwritten each time), closed, re-opened and read. This is done 20 times in a loop.
#Time of execution is analyzed to test storage performance. 
#Tests for error handling, success, and failure scenarios.

def main():
    import os
    import time

    #SCENARIO 1: SUCCESS
    start_time = time.time()
    file_count = 0

    for i in range(20):
        file = open("file_test_storage.txt", "w")
        for i in range (2000000):
            file.write(str(i)) #should write to a list? or how?
        file.close()
        file = open("file_test_storage.txt", "r")
        file.read() #Should it print?
        file_count += 1
        print("Read file # ", file_count)      
    time_delta = time.time() - start_time  
            
    if time_delta <= 50:             
        print("SUCCESS: Storage performance is good. Total time of operation was " + repr(time_delta) + " seconds")
    else:
        print("ERROR: Storage performance is poor. Total time of operation was " + repr(time_delta) + "seconds")




    #SCENARIO 2: ERROR - Time is exceeded
    start_time = time.time()
    file_count = 0

    for i in range(20):
        file = open("file_test_storage.txt", "w")
        for i in range (2000000):
            file.write(str(i)) #should write to a list? or how?
        file.close()
        file = open("file_test_storage.txt", "r")
        file.read() #Should it print?
        file_count += 1
        print("Read file # ", file_count)
        time.sleep(2)   
    time_delta = time.time() - start_time  
            
    if time_delta <= 50:             
        print("SUCCESS: Storage performance is good. Total time of operation was " + repr(time_delta) + " seconds")
    else:
        print("ERROR: Storage performance is poor Total time of operation was " + repr(time_delta) + "seconds")



    #SCENARIO 3: FORCE ERROR HANDLING - Access file not created
    #Assume the machine does not contain the file indicated below
    try:
        file = open("some_file_H3FK4NU2NDK4K2JFL.txt", "r")
    except IOError:
        print("ERROR: File does not exist.")
    else:
        print("Error handling did not work.")
        
        
main()