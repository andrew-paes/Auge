using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class AmbientePergunta : BaseEntity
    {
        public int AmbientePerguntaId { get; set; }
        public int AmbienteId { get; set; }
        public int PerguntaId { get; set; }
        public virtual Ambiente Ambiente { get; set; }
        public virtual Pergunta Pergunta { get; set; }
    }
}
