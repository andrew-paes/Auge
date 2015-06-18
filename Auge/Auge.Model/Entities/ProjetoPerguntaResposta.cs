using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class ProjetoPerguntaResposta : BaseEntity
    {
        public int ProjetoPerguntaRespostaId { get; set; }
        public int ProjetoId { get; set; }
        public int PerguntaId { get; set; }
        public Nullable<int> RespostaPerguntaId { get; set; }
        public virtual Pergunta Pergunta { get; set; }
        public virtual Projeto Projeto { get; set; }
        public virtual RespostaPergunta RespostaPergunta { get; set; }
    }
}
