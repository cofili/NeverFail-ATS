
#ISSUE: change file saving location (currently at bitbucet). 
#ISSUE: why error is printed twice??
#WORKS FOR OTHERS?

#Video Test TBD
def main():
    import os
    import pyscreenshot as ImageGrab

    try:
        screenshot =  ImageGrab.grab()
        screenshot.save('screenshot.png')
        screenshot.show()
        ImageGrab.grab().save("screenshot.png", "PNG")
    except:
        print("ERROR. Screenshot failed.")
    else:
        print("SUCCESS")
        
main()