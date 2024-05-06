using problema3.Dato;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace problema3.Negocio
{
    public class Cuentas
    {
        private CuentaBancariaAdmin CuentaDato = new CuentaBancariaAdmin();
        public DataTable MostrarCue(string id_persona)
        {
            DataTable tabla = new DataTable();
            tabla = CuentaDato.Mostrar(Convert.ToInt32(id_persona));
            return tabla;
        }
        public void InsertarCue(string tipo_cuenta, string saldo, string departamento, string id_persona)
        {
            CuentaDato.Insertar(tipo_cuenta, saldo, departamento, Convert.ToInt32(id_persona));
        }
        public void EditarCue(string tipo_cuenta, string saldo, string departamento, string id_persona, string id_cuenta_bancaria)
        {
            CuentaDato.Editar(tipo_cuenta, saldo, departamento, Convert.ToInt32(id_persona), Convert.ToInt32(id_cuenta_bancaria));
        }
        public void EliminarCue(string id_cuenta_bancaria)
        {
            CuentaDato.Eliminar(Convert.ToInt32(id_cuenta_bancaria));
        }
    }
}
