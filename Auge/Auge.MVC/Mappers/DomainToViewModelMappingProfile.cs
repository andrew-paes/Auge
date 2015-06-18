using Auge.Model.Entities;
using Auge.MVC.Areas.Administrativo.Models;
using AutoMapper;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Auge.MVC.Mappers
{
    public class DomainToViewModelMappingProfile : Profile
    {
        public override string ProfileName
        {
            get { return "DomainToViewModelMappings"; }
        }

        protected override void Configure()
        {
            Mapper.CreateMap<Loja, LojaVM>()
                //.ForMember(x => x.PorcentagemFaturamento, opt => opt.MapFrom(src => src.PorcentagemFaturamento))
                .ForMember(x => x.Nome, opt => opt.MapFrom(src => src.PessoaJuridica.Pessoa.Nome))
                .ForMember(x => x.Cnpj, opt => opt.MapFrom(src => src.PessoaJuridica.Cnpj))
                //.ForMember(x => x.Enderecos, opt => opt.MapFrom(src => src.PessoaJuridica.Pessoa.Enderecos))
                .ForMember(x => x.Telefones, opt => opt.MapFrom(src => src.PessoaJuridica.Pessoa.Telefones));
        }
    }
}