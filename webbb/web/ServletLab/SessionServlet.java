import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.util.Date;

public class SessionServlet extends HttpServlet {

    public void doPost(HttpServletRequest request,
                       HttpServletResponse response)
                       throws ServletException, IOException {

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        HttpSession session = request.getSession();

        String lang = request.getParameter("language");

        session.setAttribute("language", lang);

        out.println("<html><body>");

        out.println("<h2>Session Information</h2>");

        out.println("Session ID: " + session.getId() + "<br>");
        out.println("Selected Language: " + lang + "<br><br>");

        out.println("Is New Session: " + session.isNew() + "<br>");
        out.println("Creation Time: " +
            new Date(session.getCreationTime()) + "<br>");
        out.println("Last Accessed Time: " +
            new Date(session.getLastAccessedTime()) + "<br>");
        out.println("Max Inactive Interval: " +
            session.getMaxInactiveInterval() + " seconds<br>");

        out.println("</body></html>");
    }
}