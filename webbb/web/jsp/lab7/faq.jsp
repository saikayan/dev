<%@ page import="java.sql.*" %>

<html>
<body>

<h2>Dynamic FAQ</h2>

<%
Class.forName("com.mysql.cj.jdbc.Driver");

Connection con = DriverManager.getConnection(
"jdbc:mysql://localhost:3306/faqdb","root","");

Statement st = con.createStatement();

ResultSet rs = st.executeQuery(
"SELECT topics.topicName,faq.question,faq.answer "+
"FROM faq JOIN topics ON faq.topicID=topics.topicID");

while(rs.next())
{
%>

<h3><%= rs.getString(1) %></h3>
Q: <%= rs.getString(2) %><br>
A: <%= rs.getString(3) %><br><br>

<%
}
con.close();
%>

</body>
</html>