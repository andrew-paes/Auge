using Auge.Model.Entities;
using Auge.Model.Interfaces.Repositories;
using Auge.Model.Interfaces.Services;
using Auge.Service.Common;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Auge.Service.Services
{
   public class PessoaService : EntityService<Pessoa>, IPessoaService
  {
      IUnitOfWork _unitOfWork;
      IPessoaRepository _pessoaRepository;

      public PessoaService(IUnitOfWork unitOfWork, IPessoaRepository countryRepository)
          : base(unitOfWork, countryRepository)
      {
          _unitOfWork = unitOfWork;
          _pessoaRepository = countryRepository;
      }

      public Pessoa GetById(int Id)
      {
          return _pessoaRepository.GetById(Id);
      }
  }


}
