using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Auge.MVC.Models
{
    public class AmbienteVM
    {
        public int AmbienteID { get; set; }
        public string Nome { get; set; }
        public string Apelido { get; set; }
        public SituacaoVM Situacao { get; set; }
        public AnexoVM Anexo { get; set; }
        public IEnumerable<AnexoVM> Anexos { get; set; }
        public IEnumerable<PerguntaVM> Perguntas { get; set; }
    }
}
