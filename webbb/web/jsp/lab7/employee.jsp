<%@ page import="java.sql.*" %>

<html>
<body>

<%
Class.forName("com.mysql.cj.jdbc.Driver");

Connection con = DriverManager.getConnection(
"jdbc:mysql://localhost:3306/faqdb","root","");

Statement st = con.createStatement();

ResultSet rs = st.executeQuery("SELECT * FROM employee");

while(rs.next())
{
%>

<%= rs.getInt(1) %> -
<%= rs.getString(2) %> -
<%= rs.getString(3) %> -
<%= rs.getString(4) %> -
<%= rs.getInt(5) %><br>

<%
}
con.close();
%>

</body>
</html>