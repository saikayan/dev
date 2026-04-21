import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class FruitServlet extends HttpServlet {

    public void doPost(HttpServletRequest request,
                       HttpServletResponse response)
                       throws ServletException, IOException {

        PrintWriter out = response.getWriter();

        String fruits[] = request.getParameterValues("fruit");

        out.println("<html><body>");

        if(fruits != null)
        {
            for(String f : fruits)
                out.println(f + "<br>");
        }

        out.println("</body></html>");
    }
}