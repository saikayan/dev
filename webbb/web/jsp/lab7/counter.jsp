<%
Integer count = (Integer) session.getAttribute("count");

if(count == null)
{
    count = 1;
}
else
{
    count++;
}

session.setAttribute("count", count);
%>

<html>
<body>

Number of visits: <%= count %>

</body>
</html>