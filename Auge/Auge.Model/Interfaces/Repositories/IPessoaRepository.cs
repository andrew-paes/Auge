using Auge.Model.Entities;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Auge.Model.Interfaces.Repositories
{
    public interface IPessoaRepository : IGenericRepository<Pessoa>
    {
        Pessoa GetById(int id);
    }
}