using Auge.Model.Entities;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Auge.Model.Interfaces.Services
{
    public interface IPessoaService : IEntityService<Pessoa>
    {
        Pessoa GetById(int Id);
    }
}
