using Auge.Model.Entities;
using Auge.MVC.Areas.Administrativo.Models;
using AutoMapper;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Auge.MVC.Mappers
{
    public class ViewModelToDomainMappingProfile : Profile
    {
        public override string ProfileName
        {
            get { return "ViewModelToDomainMappings"; }
        }

        protected override void Configure()
        {
            #region LojaVM

            Mapper.CreateMap<TelefoneVM, Telefone>();
            Mapper.CreateMap<EnderecoVM, Endereco>();

            Mapper.CreateMap<LojaVM, Loja>()
               .ForMember(x => x.PessoaJuridica, opt => opt.MapFrom(model => model))
               .ForMember(x => x.PorcentagemFaturamento, opt => opt.MapFrom(model => model.PorcentagemFaturamento))
               .ForMember(x => x.DiasConferenciaProjeto, opt => opt.MapFrom(model => model.DiasConferenciaProjeto))
               .ForMember(x => x.DiasConfirmacaoMedidas, opt => opt.MapFrom(model => model.DiasConfirmacaoMedidas))
               .ForMember(x => x.DiasConfirmacaoMedidasConclusaoMontagem, opt => opt.MapFrom(model => model.DiasConfirmacaoMedidasConclusaoMontagem))
               .ForMember(x => x.EmailNotificacoes, opt => opt.MapFrom(model => model.EmailNotificacoes)); ;

            Mapper.CreateMap<LojaVM, PessoaJuridica>()
                .ForMember(x => x.Pessoa, opt => opt.MapFrom(model => model))
                .ForMember(x => x.Cnpj, opt => opt.MapFrom(src => src.Cnpj));

            Mapper.CreateMap<LojaVM, Pessoa>()
                .ForMember(x => x.Nome, opt => opt.MapFrom(src => src.Nome))
                .ForMember(x => x.Telefones, opt => opt.MapFrom(src => src.Telefones));

            Mapper.CreateMap<PessoaLojaResponsavelVM, PessoaLojaResponsavel>()
                .ForMember(x => x.Pessoa, opt => opt.MapFrom(model => model));

            Mapper.CreateMap<PessoaLojaResponsavelVM, Pessoa>()
                .ForMember(x => x.Nome, opt => opt.MapFrom(src => src.NomeResponsavel))
                .ForMember(x => x.Telefones, opt => opt.MapFrom(src => src.TelefonesResponsavel))
                .ForMember(x => x.Email, opt => opt.MapFrom(src => src.EmailResponsavel));

            #endregion

        }
    }
}