using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;

/// <summary>
/// Descripción breve de WebService
/// </summary>
[WebService(Namespace = "http://tempuri.org/")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
// Para permitir que se llame a este servicio web desde un script, usando ASP.NET AJAX, quite la marca de comentario de la línea siguiente. 
// [System.Web.Script.Services.ScriptService]
public class WebService : System.Web.Services.WebService
{
    Persona persona = new Persona();

    public WebService()
    {

        //Elimine la marca de comentario de la línea siguiente si utiliza los componentes diseñados 
        //InitializeComponent(); 
    }

    [WebMethod]
    public string HelloWorld()
    {
        return "Hola a todos";
    }

    [WebMethod]
    public int insertarPersona(string nombre, string apellido, string ci)
    {
        persona.InsertarPers(nombre, apellido, ci);
        return 1;
    }

    [WebMethod]
    public int eliminarPersona(string id_persona)
    {
        persona.EliminarPers(id_persona);
        return 1;
    }

    [WebMethod]
    public int modificarPersona(string nombre, string apellido, string ci, string id_persona)
    {
        persona.EditarPers(nombre, apellido, ci, id_persona);
        return 1;
    }

}
