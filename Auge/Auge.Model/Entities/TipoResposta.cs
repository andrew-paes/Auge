using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class TipoResposta : BaseEntity
    {
        public TipoResposta()
        {
            this.RespostaPerguntas = new List<RespostaPergunta>();
        }

        public int TipoRespostaId { get; set; }
        public string Descricao { get; set; }
        public virtual ICollection<RespostaPergunta> RespostaPerguntas { get; set; }
    }
}
