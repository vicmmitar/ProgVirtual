using MySql.Data.MySqlClient;
using problema3.Dato;
using problema3.Modelo;
using problema3.Negocio;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace problema3
{
    public partial class Form1 : Form
    {
        Personas objetoCN = new Personas();
        Cuentas cuentasCN = new Cuentas();
        private string id_persona = null;
        private string id_cuenta_bancaria = null;
        private bool Editar = false;
        private bool EditarCuentas = false;
        private bool MostrarCuentas = false;
        public Form1()
        {
            InitializeComponent();
            //Inicializar();
        }
        private void Form1_Load(object sender, EventArgs e)
        {
            MostrarPersonas();
        }
        private void MostrarPersonas()
        {
            Personas objeto = new Personas();
            tablaPersonas.DataSource = objeto.MostrarPers();
        }
        private void btnGuardar_Click(object sender, EventArgs e)
        {
            if (MostrarCuentas)
            {
                //INSERTAR
                if (EditarCuentas == false)
                {
                    try
                    {
                        cuentasCN.InsertarCue(txtTipoCuenta.Text, txtSaldo.Text, txtDepartamento.Text, id_persona);
                        MessageBox.Show("se inserto correctamente");
                        LlenarCuentas();
                        limpiarFormCuentas();
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("no se pudo insertar los datos por: " + ex);
                    }
                }
                //EDITAR
                if (EditarCuentas == true)
                {
                    try
                    {
                        cuentasCN.EditarCue(txtTipoCuenta.Text, txtSaldo.Text, txtDepartamento.Text, id_persona, id_cuenta_bancaria);
                        MessageBox.Show("se edito correctamente");
                        LlenarCuentas();
                        limpiarFormCuentas();
                        Editar = false;
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("no se pudo editar los datos por: " + ex);
                    }
                }
            }
            else
            {
                //INSERTAR
                if (Editar == false)
                {
                    try
                    {
                        objetoCN.InsertarPers(txtNombre.Text, txtApellido.Text, txtCi.Text);
                        MessageBox.Show("se inserto correctamente");
                        MostrarPersonas();
                        limpiarForm();
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("no se pudo insertar los datos por: " + ex);
                    }
                }
                //EDITAR
                if (Editar == true)
                {
                    try
                    {
                        objetoCN.EditarPers(txtNombre.Text, txtApellido.Text, txtCi.Text, id_persona);
                        MessageBox.Show("se edito correctamente");
                        MostrarPersonas();
                        limpiarForm();
                        Editar = false;
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("no se pudo editar los datos por: " + ex);
                    }
                }
            }
        }
        private void btnEditar_Click(object sender, EventArgs e)
        {
            if (MostrarCuentas)
            {
                if (tablaPersonas.SelectedRows.Count > 0)
                {
                    EditarCuentas = true;
                    txtTipoCuenta.Text = tablaPersonas.CurrentRow.Cells["tipo_cuenta"].Value.ToString();
                    txtSaldo.Text = tablaPersonas.CurrentRow.Cells["saldo"].Value.ToString();
                    txtDepartamento.Text = tablaPersonas.CurrentRow.Cells["departamento"].Value.ToString();
                    id_persona = tablaPersonas.CurrentRow.Cells["id_persona"].Value.ToString();
                    id_cuenta_bancaria = tablaPersonas.CurrentRow.Cells["id_cuenta_bancaria"].Value.ToString();
                }
                else
                    MessageBox.Show("seleccione una fila por favor");
            }
            else
            {
                if (tablaPersonas.SelectedRows.Count > 0)
                {
                    Editar = true;
                    txtNombre.Text = tablaPersonas.CurrentRow.Cells["nombre"].Value.ToString();
                    txtApellido.Text = tablaPersonas.CurrentRow.Cells["apellido"].Value.ToString();
                    txtCi.Text = tablaPersonas.CurrentRow.Cells["ci"].Value.ToString();
                    id_persona = tablaPersonas.CurrentRow.Cells["id_persona"].Value.ToString();
                }
                else
                    MessageBox.Show("seleccione una fila por favor");
            }
        }
        private void limpiarForm()
        {
            txtApellido.Clear();
            txtCi.Text = "";
            txtNombre.Clear();
        }
        private void limpiarFormCuentas()
        {
            txtTipoCuenta.Clear();
            txtSaldo.Text = "";
            txtDepartamento.Clear();
        }
        private void btnEliminar_Click(object sender, EventArgs e)
        {
            if (MostrarCuentas)
            {
                if (tablaPersonas.SelectedRows.Count > 0)
                {
                    id_cuenta_bancaria = tablaPersonas.CurrentRow.Cells["id_cuenta_bancaria"].Value.ToString();
                    cuentasCN.EliminarCue(id_cuenta_bancaria);
                    MessageBox.Show("Eliminado correctamente");
                    LlenarCuentas();
                }
                else
                    MessageBox.Show("seleccione una fila por favor");
            }
            else
            {
                if (tablaPersonas.SelectedRows.Count > 0)
                {
                    id_persona = tablaPersonas.CurrentRow.Cells["id_persona"].Value.ToString();
                    objetoCN.EliminarPers(id_persona);
                    MessageBox.Show("Eliminado correctamente");
                    MostrarPersonas();
                }
                else
                    MessageBox.Show("seleccione una fila por favor");
            }
            
        }

        private void Inicializar()
        {
            MostrarPersonas();
            limpiarForm();
            MostrarCuentas = false;
            label1.Visible = false;
            label5.Visible = false;
            label6.Visible = false;
            txtTipoCuenta.Visible = false;
            txtSaldo.Visible = false;
            txtDepartamento.Visible = false;
            Editar = false;
            MostrarCuentas=false;
            EditarCuentas = false;
        }

        private void LlenarCuentas()
        {
            id_persona = tablaPersonas.CurrentRow.Cells["id_persona"].Value.ToString();
            Cuentas objeto = new Cuentas();
            tablaPersonas.DataSource = objeto.MostrarCue(id_persona);
        }
        private void btnMostrarCuentas_Click(object sender, EventArgs e)
        {
            MostrarCuentas = true;
            label1.Visible = true;
            label5.Visible = true;
            label6.Visible = true;
            txtTipoCuenta.Visible = true;
            txtSaldo.Visible = true;
            txtDepartamento.Visible = true;
            LlenarCuentas();
        }

        private void btnAtras_Click(object sender, EventArgs e)
        {
            Inicializar();
        }

    }
}
