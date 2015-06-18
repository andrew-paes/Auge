using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class UsuarioLoja : BaseEntity
    {
        public int UsuarioLojaId { get; set; }
        public int UsuarioId { get; set; }
        public int LojaId { get; set; }
        public bool Responsavel { get; set; }
        public virtual Loja Loja { get; set; }
        public virtual Usuario Usuario { get; set; }
    }
}
