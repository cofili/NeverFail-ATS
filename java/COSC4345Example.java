<<<<<<< HEAD
// COSC4345 Example.Alibrahim
=======
// COSC4345 Example
>>>>>>> c039ca364f0fbab88f7ca8d8b5eb1d0046770257
// This class provides an example of how to connect to a web server to retrieve
// a Python script name, execute the script and print the return results

package cosc4345ExamplePackage;

<<<<<<< HEAD
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.net.MalformedURLException;
=======
import java.net.URL;
import java.net.URLConnection;
import java.util.ArrayList;
import java.net.MalformedURLException;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.BufferedReader;
import java.awt.List;
>>>>>>> c039ca364f0fbab88f7ca8d8b5eb1d0046770257
import java.io.*;

public class COSC4345Example {
	
	public static void main(String[] args) {
		try {
			
<<<<<<< HEAD
			

			
			String script = null;
			String newResult = null;
			String sutId = "2";
			
			
			URL obj3 = new URL("http://cosc4345-team5.com/features/getTest.php?action=getTest&scriptName=" +script);
			HttpURLConnection con3 = (HttpURLConnection) obj3.openConnection();
			con3.setRequestMethod("GET");
			con3.setRequestProperty("action", "getTest");
			con3.setRequestProperty("scriptName",script);
			int responseCode3 = con3.getResponseCode();
			System.out.println("Get response code [obj3]" +responseCode3);
			
			URL obj2 = new URL("http://cosc4345-team5.com/features/getTest.php?action=getTest&sutId=" +sutId);
			HttpURLConnection con2 = (HttpURLConnection) obj2.openConnection();
			con2.setRequestMethod("GET");
			con2.setRequestProperty("action", "getTest");
			con2.setRequestProperty("sutId",sutId);
			int responseCode2 = con2.getResponseCode();
			System.out.println("Get response code" +responseCode2);
			
			
			
			
			
=======
>>>>>>> c039ca364f0fbab88f7ca8d8b5eb1d0046770257
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
<<<<<<< HEAD
		
=======
			String script = null;
			
>>>>>>> c039ca364f0fbab88f7ca8d8b5eb1d0046770257
			// Read the return results and create a string with the python command to execute
			//
			while ((result = reader.readLine()) != null) {
				result = result.replace("\"",  "");
<<<<<<< HEAD
				script = "python " + result;
=======
				script = "python  " + result;
>>>>>>> c039ca364f0fbab88f7ca8d8b5eb1d0046770257
				
			}
			reader.close();
			
			// Now spawn another process to execute the Python script
			//
			Process p = Runtime.getRuntime().exec(script);
			BufferedReader stdInput = new BufferedReader(new
					InputStreamReader(p.getInputStream()));
			
			// We need to know if the test script succeeded or failed
			// Replace this code with something that checks the return value for "SUCCESS"
			// For now, just print the return results
			//
<<<<<<< HEAD
			while ((s = stdInput.readLine()) != null) {
				System.out.println(s);
				newResult = s;
			}
			System.out.println("================");
			System.out.println("("+script +")");
			System.out.println("================");
			System.out.println("("+newResult+")");
				
			
			
			
			

			URL obj = new URL("http://cosc4345-team5.com/features/getTest.php?action=putResult&result=" +newResult);
			HttpURLConnection con = (HttpURLConnection) obj.openConnection();
			con.setRequestMethod("GET");
			con.setRequestProperty("action", "putResult");
			con.setRequestProperty("result", newResult);
			int responseCode = con.getResponseCode();
			System.out.println("Get response code" +responseCode);
			
	
			
			// You may need to add more code here to return the SUCCESS or FAIL back to the
			// database for tracking puposes.  That code should go here

=======
			
			String output = "";
			int outputIndex = 0;
			ArrayList<String> outputList = new ArrayList<String>();
			while ((s = stdInput.readLine()) != null) {
				outputList.add(s);
				outputIndex++;
				//output+=outputCount;
				//output+=s;
				//outputCount;
			
			
				System.out.println(s);
				
			}
			String testResult = outputList.get(0);
			String errorMessage = outputList.get(1);
			
			
			
			System.out.println("test result:");
			System.out.println(testResult);
			System.out.println("error message:");
			System.out.println(errorMessage);
			
			System.out.println(output);
			System.out.println(script);
			
			
			// You may need to add more code here to return the SUCCESS or FAIL back to the
			// database for tracking purposes.  That code should go here

			URL url2 = new URL("http://cosc4345-team5.com/features/getTest.php"); //?action=putResult&Result=SOMETHING&description=SOMEERROR&sutId=SOMENUMBER");
			URLConnection con = url2.openConnection();
			con.setDoOutput(true);
			PrintStream ps = new PrintStream(con.getOutputStream());
		    // send your parameters to your site
			ps.print("action=putResult");
		    ps.print("&Result=SOMETHING");
		    ps.print("&description=SOMEERROR");
		    ps.print("&sutId=SOMENUMBER"); 
		    
		 
		    // we have to get the input stream in order to actually send the request
		    con.getInputStream();
		 
		    // close the print stream
		    ps.close();
			
>>>>>>> c039ca364f0fbab88f7ca8d8b5eb1d0046770257
		}
		catch(MalformedURLException e) {
			throw new RuntimeException(e);
		}
		catch(IOException e) {
			throw new RuntimeException(e);
			
		}
<<<<<<< HEAD
	
	
	
}
	
	
=======
	}
>>>>>>> c039ca364f0fbab88f7ca8d8b5eb1d0046770257
}