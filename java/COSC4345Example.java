// COSC4345 Example.Alibrahim
// COSC4345 Example
// This class provides an example of how to connect to a web server to retrieve
// a Python script name, execute the script and print the return results

package cosc4345ExamplePackage;

import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;
import java.util.ArrayList;
import java.net.MalformedURLException;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.BufferedReader;
import java.awt.List;
import java.io.*;

public class COSC4345Example_Alibrahim {
    
    
    public static void main(String[] args) {
        try {
            
            
            
            
            
            
            //----------------------------------------------------------------------------------
            // Create a url with a query string to get the next test to execute on this client
            //
            URL url = new URL("http://cosc4345-team5.com/features/getNextTest.php?action=getScriptName");
            
            // Open the connection to the web server
            //
            URLConnection sock = url.openConnection();
            
            // Create a BufferedReader object to read the return results
            //
            BufferedReader reader =
            new BufferedReader(new InputStreamReader(sock.getInputStream()));
            
            String result = null;
            String s = null;
            String script = null;
            String newResult = null;
            String sutId = "2";
            // Read the return results and create a string with the python command to execute
            //
            while ((result = reader.readLine()) != null) {
                result = result.replace("\"",  "");
                script = "python "+result;
                
                
            }
            
            
            URL obj3 = new URL("http://cosc4345-team5.com/features/getTest.php?action=getTest&scriptName=" +script);
            HttpURLConnection con3 = (HttpURLConnection) obj3.openConnection();
            con3.setRequestMethod("GET");
            con3.setRequestProperty("action", "getTest");
            con3.setRequestProperty("scriptName",script);
            int responseCode3 = con3.getResponseCode();
            System.out.println("Get response code [obj3 +script]" +responseCode3);
            
            //--------------------------------------------
            
            
            
            URL obj2 = new URL("http://cosc4345-team5.com/features/getTest.php?action=getTest&sutId=" +sutId);
            HttpURLConnection con2 = (HttpURLConnection) obj2.openConnection();
            con2.setRequestMethod("GET");
            con2.setRequestProperty("action", "getTest");
            con2.setRequestProperty("sutId",sutId);
            int responseCode2 = con2.getResponseCode();
            System.out.println("Get response code [sutId]" +responseCode2);
            
            
            
            
            
            reader.close();
            
            
            
            //----------------------------------------------------------------------------------
            
            
            // Now spawn another process to execute the Python script
            //
            Process p = Runtime.getRuntime().exec(script);
            BufferedReader stdInput = new BufferedReader(new
                                                         InputStreamReader(p.getInputStream()));
            
            // We need to know if the test script succeeded or failed
            // Replace this code with something that checks the return value for "SUCCESS"
            // For now, just print the return results
            //
            
            /*	while ((s = stdInput.readLine()) != null) {
             //System.out.println(s);
             
             newResult = s;
             }*/
            
            
            //Create an string array to capture python output
            ArrayList<String> outputList = new ArrayList<String>();
            while ((s = stdInput.readLine()) != null) {
                outputList.add(s);
                
                //System.out.println(s);
                
            }
            //put python output into variables
            String testResult = outputList.get(0);
            String resultDescription = outputList.get(1);
            
            
            System.out.println("test result:--> "+testResult);
            System.out.println("Result description:---> "+resultDescription);
            
            
            
            
            System.out.println("================");
            System.out.println("running script ("+script +")");
            System.out.println(sutId);
            System.out.println("================");
            
            
            String testId = "2";
            URL obj4 = new URL("http://cosc4345-team5.com/features/getTest.php?action=putResult&testId=" +testId);
            HttpURLConnection con4 = (HttpURLConnection) obj4.openConnection();
            con4.setRequestMethod("GET");
            con4.setRequestProperty("action", "putResult");
            con4.setRequestProperty("testId", testId);
            int responseCode4 = con4.getResponseCode();
            System.out.println("Get response code [obj 4]" +responseCode4);
            
            
            //----------------------------------------------
            
            
            //--------------------------------------------
            
            URL obj = new URL("http://cosc4345-team5.com/features/getTest.php?action=putResult&result=" +testResult + "&resultDesc=" +resultDescription);
            HttpURLConnection con = (HttpURLConnection) obj.openConnection();
            con.setRequestMethod("GET");
            con.setRequestProperty("action", "putResult");
            con.setRequestProperty("result", testResult);
            con.setRequestProperty("resultDesc", resultDescription);
            int responseCode = con.getResponseCode();
            System.out.println("Get response code[testresult] " +responseCode);
            
            /*
             //--------------------------------------------------------
             URL obj5 = new URL("http://cosc4345-team5.com/features/getTest.php?action=putResult&resultDesc=" +resultDescription);
             HttpURLConnection con5 = (HttpURLConnection) obj5.openConnection();
             con5.setRequestMethod("GET");
             con5.setRequestProperty("action", "putResult");
             con5.setRequestProperty("resultDesc", resultDescription);
             int responseCode5 = con5.getResponseCode();
             System.out.println("Get response code[5-result desc]" +responseCode5);
             */
            
            // You may need to add more code here to return the SUCCESS or FAIL back to the
            // database for tracking puposes.  That code should go here
            
        }
        catch(MalformedURLException e) {
            throw new RuntimeException(e);
        }
        catch(IOException e) {
            throw new RuntimeException(e);
            
        }
        
        
        
    }
    
}

