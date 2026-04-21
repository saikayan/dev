<%@ page import="java.sql.*" %>

<%
String animal = request.getParameter("animal");

Class.forName("com.mysql.cj.jdbc.Driver");

Connection con = DriverManager.getConnection(
"jdbc:mysql://localhost:3306/faqdb","root","");

PreparedStatement ps = con.prepareStatement(
"UPDATE survey SET votes=votes+1 WHERE animal=?");

ps.setString(1,animal);
ps.executeUpdate();

Statement st = con.createStatement();
ResultSet rs = st.executeQuery("SELECT * FROM survey");

int total = 0;
while(rs.next())
    total += rs.getInt("votes");

rs = st.executeQuery("SELECT * FROM survey");
%>

<html>
<body>

<h2>Survey Results</h2>

<%
while(rs.next())
{
int v = rs.getInt("votes");
double p = (v*100.0)/total;
%>

<%= rs.getString("animal") %> :
<%= v %> votes (<%= p %>% )<br>

<%
}
%>

Total: <%= total %>

</body>
</html>