using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class GrupoUsuario : BaseEntity
    {
        public GrupoUsuario()
        {
            this.UsuarioGrupos = new List<UsuarioGrupo>();
        }

        public int GrupoUsuarioId { get; set; }
        public string Descricao { get; set; }
        public bool Ativo { get; set; }
        public virtual ICollection<UsuarioGrupo> UsuarioGrupos { get; set; }
    }
}
