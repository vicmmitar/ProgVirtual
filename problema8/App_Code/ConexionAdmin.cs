using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Data;
using System.Linq;
using System.Web;

public class ConexionAdmin
{
    private SqlConnection Conexion = new SqlConnection("server=(local); user=vicmmitar ;pwd = 8597; database = bdvictor");
    public SqlConnection AbrirConexion()
    {
        if (Conexion.State == ConnectionState.Closed)
            Conexion.Open();
        return Conexion;
    }
    public SqlConnection CerrarConexion()
    {
        if (Conexion.State == ConnectionState.Open)
            Conexion.Close();
        return Conexion;
    }
}