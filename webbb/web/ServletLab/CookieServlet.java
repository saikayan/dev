import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class CookieServlet extends HttpServlet {

    public void doPost(HttpServletRequest request,
                       HttpServletResponse response)
                       throws ServletException, IOException {

        String lang = request.getParameter("language");

        Cookie c = new Cookie("language", lang);
        response.addCookie(c);

        PrintWriter out = response.getWriter();

        out.println("<html><body>");
        out.println("Cookie stored for language: " + lang);
        out.println("</body></html>");
    }
}