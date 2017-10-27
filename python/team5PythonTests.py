#COSC4349
#PROJECT
#PYTHON TESTS
#TEAM 5


# Memory Test
def memory_test():
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
    """
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
        print("ERROR: Memory is slow. Total time of operation was " + repr(time_delta) + "seconds")
    """


    
    #SCENARIO 3: FORCE ERROR HANDLING - Access memory list beyond boundary
    """
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
    """   


# Storage Test
def storage_test():

    #SCENARIO 1: SUCCESS

    import time
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
    """
    import time
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
    """


    
    #SCENARIO 1: FORCE ERROR HANDLING - Access file not created
    #Assume the machine does not contain the file indicated below
    """
    try:
        file = open("some_file_H3FK4NU2NDK4K2JFL.txt", "r")
    except IOError:
        print("ERROR: File does not exist.")
    else:
        print("Error handling did not work.")
    """





# Networking Test TBD
def networking_test():
    import urllib
    
    url = "http://jbryan2.create.stedwards.edu/"
    url_file = urllib.urlopen(url)
    try:
            myfile = url_file.read()
            print("SUCCESS")
    except:
            print("ERROR")



	
# CPU Test TBD
def cpu_test():
    million = 1000000 
    try:
            for i in range(million):
                    random()
            print("SUCCESS")
    except:
            print("ERROR")





#main
#Calls functions that test major subsystems
print("Test of Major Subsystems\n")
test = int(input("""Enter test number:
    \n\t 1 = Memory Test
    \n\t 2 = Storage Test
    \n\t 2 = Networking Test - IN PROGRESS
    \n\t 4 = CPU Test - IN PROGRESS\n\n"""))

if test == 1:
    memory_test()
elif test == 2:
    storage_test()
elif test == 3:
    networking_test()
elif test == 4:
    cpu_test()
else:
    print("Error. Input integer between 1-4")








    
