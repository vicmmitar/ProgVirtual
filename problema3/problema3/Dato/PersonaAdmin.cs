using problema3.Modelo;
using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace problema3.Dato
{
    public class PersonaAdmin
    {

        private ConexionAdmin conexionAdmin = new ConexionAdmin();
        SqlDataReader leer;
        DataTable tabla = new DataTable();
        SqlCommand comando = new SqlCommand();

        public DataTable Mostrar()
        {
            comando.Connection = conexionAdmin.AbrirConexion();
            comando.CommandText = "MostrarPersonas";
            comando.CommandType = CommandType.StoredProcedure;
            leer = comando.ExecuteReader();
            tabla.Load(leer);
            conexionAdmin.CerrarConexion();
            return tabla;
        }

        public void Insertar(string nombre, string apellido, string ci)
        {
            comando.Connection = conexionAdmin.AbrirConexion();
            comando.CommandText = "InsetarPersonas";
            comando.CommandType = CommandType.StoredProcedure;
            comando.Parameters.AddWithValue("@nombre", nombre);
            comando.Parameters.AddWithValue("@apellido", apellido);
            comando.Parameters.AddWithValue("@ci", ci);
            comando.ExecuteNonQuery();
            comando.Parameters.Clear();
            conexionAdmin.CerrarConexion();
        }
        public void Editar(string nombre, string apellido, string ci, int id_persona)
        {
            comando.Connection = conexionAdmin.AbrirConexion();
            comando.CommandText = "EditarPersona";
            comando.CommandType = CommandType.StoredProcedure;
            comando.Parameters.AddWithValue("@nombre", nombre);
            comando.Parameters.AddWithValue("@apellido", apellido);
            comando.Parameters.AddWithValue("@ci", ci);
            comando.Parameters.AddWithValue("@id_persona", id_persona);
            comando.ExecuteNonQuery();
            comando.Parameters.Clear();
            conexionAdmin.CerrarConexion();
        }
        public void Eliminar(int id_persona)
        {
            comando.Connection = conexionAdmin.AbrirConexion();
            comando.CommandText = "EliminarPersona";
            comando.CommandType = CommandType.StoredProcedure;
            comando.Parameters.AddWithValue("@id_persona", id_persona);
            comando.ExecuteNonQuery();
            comando.Parameters.Clear();
            conexionAdmin.CerrarConexion();
        }

        /// <summary>
        /// Consulta todas las personas
        /// </summary>
        /// <returns></returns>
        public List<persona> Consultar()
        {
            using (bdvictorEntities contexto = new bdvictorEntities())
            {
                return contexto.persona.AsNoTracking().ToList();
            }
        }

        /// <summary>
        /// Guarda los datos en la tabla
        /// </summary>
        /// <param name="modelo"></param>
        public void Guardar(persona modelo)
        {
            using (bdvictorEntities contexto = new bdvictorEntities())
            {
                contexto.persona.Add(modelo);
                contexto.SaveChanges();
            }
        }
    }
}
