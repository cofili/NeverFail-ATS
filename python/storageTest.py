#Tests major subsytem: Storage
#Creates 3mb files filled with consecutive integers. Each file is created (overwritten each time), closed, re-opened and read. This is done 20 times in a loop.
#Time of execution is analyzed to test storage performance. 
#Tests for error handling, success, and failure scenarios.
import os, errno, sys
import time


def main():
    #set maximum allowed execution time
    max_time = 3
    start_time = time.time()
    run()
    #time.sleep(50) #Adds time to execution to force error
    time_delta = time.time() - start_time
    
    
    #Raise error if time duration does not meet test requirement; otherwise returns SUCCESS
    try:  
        if time_delta >= max_time:   
            raise ValueError("ERROR")
    except ValueError as ve:
        print(ve)
        print("ValueError....Storage_performance_is_too_slow")
        sys.exit(0)
        
    else:    
        print("SUCCESS")
        print("")                
  
  
def run():
    
    range_size = 50000
    min_file_size = 1000000
    
    #create file to write to
    try:
        fw = open("storage_test.txt", "w")
    except IOError:
        print("ERROR")
        print("IOError....File_not_found")
        sys.exit(0)
    
    #write to file
    for i in range(range_size):
        fw.write("Testing Storage...  ")
    
    #close file
    fw.close()
        
    
    #open file creted to read from
    try:
        fr = open("storage_test.txt", "r")
        #fr = open("some_file_GDKDH3FJ2948MNF3J.txt", "r")    #code to force error handling: file not found
    except OSError:
        print("ERROR")
        print("IOError....File_not_found")
        sys.exit(0)
        
    #read from file
    fileContent = fr.readlines()
    #print(fileContent)
    
    
    #close file
    fr.close()
    
    
    #test if file was created and file size
    try:
        file_size = os.path.getsize("storage_test.txt")
        if (file_size < min_file_size):
            raise ValueError("ERROR")
        
    except ValueError as ve:
        print(ve)
        print("ValueError....Need_to_test_a_file_with_bigger_size")
        sys.exit(0)
        
    except (IOError):
        print("ERROR")
        print("IOError....File_not_found")
        sys.exit(0)
    
        
main()