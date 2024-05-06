using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Web;

/// <summary>
/// Descripción breve de Persona
/// </summary>
public class Persona
{
    private PersonaAdmin PersonaDato = new PersonaAdmin();
    public DataTable MostrarPers()
    {
        DataTable tabla = new DataTable();
        tabla = PersonaDato.Mostrar();
        return tabla;
    }
    public void InsertarPers(string nombre, string apellido, string ci)
    {
        PersonaDato.Insertar(nombre, apellido, ci);
    }
    public void EditarPers(string nombre, string apellido, string ci, string id_persona)
    {
        PersonaDato.Editar(nombre, apellido, ci, Convert.ToInt32(id_persona));
    }
    public void EliminarPers(string id_persona)
    {
        PersonaDato.Eliminar(Convert.ToInt32(id_persona));
    }
}