using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class UsuarioGrupo : BaseEntity
    {
        public int UsuarioGrupoId { get; set; }
        public int GrupoUsuarioId { get; set; }
        public int UsuarioId { get; set; }
        public virtual GrupoUsuario GrupoUsuario { get; set; }
        public virtual Usuario Usuario { get; set; }
    }
}
