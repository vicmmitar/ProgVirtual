//------------------------------------------------------------------------------
// <auto-generated>
//     Este código se generó a partir de una plantilla.
//
//     Los cambios manuales en este archivo pueden causar un comportamiento inesperado de la aplicación.
//     Los cambios manuales en este archivo se sobrescribirán si se regenera el código.
// </auto-generated>
//------------------------------------------------------------------------------

namespace problema3.Modelo
{
    using System;
    using System.Collections.Generic;
    
    public partial class cuenta_bancaria
    {
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2214:DoNotCallOverridableMethodsInConstructors")]
        public cuenta_bancaria()
        {
            this.transaccion_bancaria = new HashSet<transaccion_bancaria>();
            this.transaccion_bancaria1 = new HashSet<transaccion_bancaria>();
        }
    
        public int id_cuenta_bancaria { get; set; }
        public string tipo_cuenta { get; set; }
        public string saldo { get; set; }
        public string departamento { get; set; }
        public int id_persona { get; set; }
    
        public virtual persona persona { get; set; }
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2227:CollectionPropertiesShouldBeReadOnly")]
        public virtual ICollection<transaccion_bancaria> transaccion_bancaria { get; set; }
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2227:CollectionPropertiesShouldBeReadOnly")]
        public virtual ICollection<transaccion_bancaria> transaccion_bancaria1 { get; set; }
    }
}
