using problema3.Modelo;
using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace problema3.Dato
{
    public class CuentaBancariaAdmin
    {
        private ConexionAdmin conexionAdmin = new ConexionAdmin();
        SqlDataReader leer;
        DataTable tabla = new DataTable();
        SqlCommand comando = new SqlCommand();

        public DataTable Mostrar(int id_persona)
        {
            comando.Connection = conexionAdmin.AbrirConexion();
            comando.CommandText = "MostrarCuentasEspecificas";
            comando.CommandType = CommandType.StoredProcedure;
            comando.Parameters.AddWithValue("@id_persona", id_persona);
            leer = comando.ExecuteReader();
            tabla.Load(leer);
            conexionAdmin.CerrarConexion();
            return tabla;
        }

        public void Insertar(string tipo_cuenta, string saldo, string departamento, int id_persona)
        {
            comando.Connection = conexionAdmin.AbrirConexion();
            comando.CommandText = "InsetarCuenta";
            comando.CommandType = CommandType.StoredProcedure;
            comando.Parameters.AddWithValue("@tipo_cuenta", tipo_cuenta);
            comando.Parameters.AddWithValue("@saldo", saldo);
            comando.Parameters.AddWithValue("@departamento", departamento);
            comando.Parameters.AddWithValue("@id_persona", id_persona);
            comando.ExecuteNonQuery();
            comando.Parameters.Clear();
            conexionAdmin.CerrarConexion();
        }
        public void Editar(string tipo_cuenta, string saldo, string departamento, int id_persona, int id_cuenta_bancaria)
        {
            comando.Connection = conexionAdmin.AbrirConexion();
            comando.CommandText = "EditarCuenta";
            comando.CommandType = CommandType.StoredProcedure;
            comando.Parameters.AddWithValue("@tipo_cuenta", tipo_cuenta);
            comando.Parameters.AddWithValue("@saldo", saldo);
            comando.Parameters.AddWithValue("@departamento", departamento);
            comando.Parameters.AddWithValue("@id_persona", id_persona);
            comando.Parameters.AddWithValue("@id_cuenta_bancaria", id_cuenta_bancaria);
            comando.ExecuteNonQuery();
            comando.Parameters.Clear();
            conexionAdmin.CerrarConexion();
        }
        public void Eliminar(int id_cuenta_bancaria)
        {
            comando.Connection = conexionAdmin.AbrirConexion();
            comando.CommandText = "EliminarCuenta";
            comando.CommandType = CommandType.StoredProcedure;
            comando.Parameters.AddWithValue("@id_cuenta_bancaria", id_cuenta_bancaria);
            comando.ExecuteNonQuery();
            comando.Parameters.Clear();
            conexionAdmin.CerrarConexion();
        }

    }
}
