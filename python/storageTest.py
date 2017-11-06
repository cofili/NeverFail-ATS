#Tests major subsytem: Storage
#Creates 3mb files filled with consecutive integers. Each file is created (overwritten each time), closed, re-opened and read. This is done 20 times in a loop.
#Time of execution is analyzed to test storage performance. 
#Tests for error handling, success, and failure scenarios.
import os, errno, random, sys
import time


def main():
    max_time = 50
    start_time = time.time()
    run()
    #time.sleep(50) #Adds time to execution to force error
    time_delta = time.time() - start_time
    
    
    #Raise error if time duration does not meet test requirement; otherwise returns SUCCESS
    try:  
        if time_delta > max_time:   
            raise ValueError("ERROR")
    except ValueError as ve:
        print(ve)
        print("ValueError: Storage performance is poor")
        
    else:    
        print("SUCCESS")
        #print("Time of execution: " + repr(round(time_delta,2)) + " seconds")
                
  
  
def run():
    try:
        for i in range(20):
            file = open("file_test_storage.txt", "w")
            for i in range (1000):
                file.write(str(i)) #should write to a list? or how?
            file.close()
            file = open("file_test_storage.txt", "r")
            file.read() 
            #file_count += 1
            #print("Read file # ", file_count)      
                
    
        #open an non-existing file for error handling
        #os.remove("some_file_YJG35J79NEK1Y82.txt")  #check if file exists and deletes it
        #some_file = open("some_file_YJG35J79NEK1Y82.txt", "r") 
        
    except IOError:
        print("ERROR")
        print("IOError - file not found")
        sys.exit(0)
    
        
        
main()