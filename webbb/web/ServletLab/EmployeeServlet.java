import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class EmployeeServlet extends HttpServlet {

    public void doPost(HttpServletRequest request,
                       HttpServletResponse response)
                       throws ServletException, IOException {

        response.setContentType("text/html");

        PrintWriter out = response.getWriter();

        out.println("<html><body>");

        out.println("Name: " + request.getParameter("name") + "<br>");
        out.println("ID: " + request.getParameter("id") + "<br>");
        out.println("DOB: " + request.getParameter("dob") + "<br>");
        out.println("Department: " + request.getParameter("dept") + "<br>");
        out.println("Salary: " + request.getParameter("salary") + "<br>");
        out.println("Email: " + request.getParameter("email") + "<br>");

        out.println("</body></html>");
    }
}