import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class ColorServlet extends HttpServlet {

    public void doGet(HttpServletRequest request,
                      HttpServletResponse response)
                      throws ServletException, IOException {

        PrintWriter out = response.getWriter();

        String color = request.getParameter("color");

        out.println("<html><body>");
        out.println("Selected Color: " + color);
        out.println("</body></html>");
    }
}