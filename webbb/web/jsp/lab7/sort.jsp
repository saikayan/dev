<%@ page import="java.util.*" %>

<html>
<body>

<%
ArrayList<String> names = new ArrayList<String>();

names.add("Sai");
names.add("Ravi");
names.add("Anil");
names.add("Kiran");

Collections.sort(names);

for(String n : names)
{
    out.println(n + "<br>");
}
%>

</body>
</html>