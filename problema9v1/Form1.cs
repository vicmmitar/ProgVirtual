using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace problema9v1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void btnInsertar_Click(object sender, EventArgs e)
        {
            ApiPersona.WebServiceSoapClient ws = new ApiPersona.WebServiceSoapClient();
            string nombre = txtNombre.Text;
            string apellido = txtApellido.Text;
            string ci = txtCi.Text;
            string idPersona = txtIdPersona.Text;
            ws.insertarPersona(nombre, apellido, ci);
        }

        private void btnEditar_Click(object sender, EventArgs e)
        {
            ApiPersona.WebServiceSoapClient ws = new ApiPersona.WebServiceSoapClient();
            string nombre = txtNombre.Text;
            string apellido = txtApellido.Text;
            string ci = txtCi.Text;
            string idPersona = txtIdPersona.Text;
            ws.modificarPersona(nombre, apellido, ci, idPersona);
        }

        private void btnEliminar_Click(object sender, EventArgs e)
        {
            ApiPersona.WebServiceSoapClient ws = new ApiPersona.WebServiceSoapClient();
            string idPersona = txtIdPersona.Text;
            ws.eliminarPersona(idPersona);
        }
    }
}
