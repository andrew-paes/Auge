using Auge.Model.Entities;
using Auge.MVC.Areas.Administrativo.Models;
using Auge.MVC.Mappers;
using AutoMapper;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using System.Collections.Generic;
using System.Linq;

namespace Auge.Tests.MVC.Mapping
{
    [TestClass]
    public class MappingTest
    {
        [TestMethod]
        public void AutoMapper_Configuration_IsValid()
        {
            AutoMapperConfig.RegisterMappings();            
            Mapper.AssertConfigurationIsValid();
        }

        [TestMethod]
        public void Mapeamento_Loja_Dominio_para_View_esta_correto()
        {
            var expectedTelefone = new Telefone() { Numero = "98765432" };

            var lojas = new List<Loja> 
            {
                new Loja() { 
                    LojaId = 1, 
                    PessoaJuridicaId = 1, 
                    PessoaJuridica = new PessoaJuridica() 
                    { 
                        PessoaId = 1, 
                        Cnpj = "123123",
                        Pessoa = new Pessoa() 
                        { 
                            Nome = "Fulano", 
                            Email = "a@b.com", 
                            Telefones = new List<Telefone>()
                            {
                                new Telefone() { Numero = "98765432" }
                            } 
                        }
                    }
                    
                }
            };

            Mapper.CreateMap<Loja, LojaVM>()
                //.ForMember(x => x.PorcentagemFaturamento, opt => opt.MapFrom(src => src.PorcentagemFaturamento))
                .ForMember(x => x.Nome, opt => opt.MapFrom(src => src.PessoaJuridica.Pessoa.Nome))
                .ForMember(x => x.Cnpj, opt => opt.MapFrom(src => src.PessoaJuridica.Cnpj))
                //.ForMember(x => x.Enderecos, opt => opt.MapFrom(src => src.PessoaJuridica.Pessoa.Enderecos))
                .ForMember(x => x.Telefones, opt => opt.MapFrom(src => src.PessoaJuridica.Pessoa.Telefones));

            ICollection<LojaVM> model = Mapper.Map<ICollection<Loja>, ICollection<LojaVM>>(lojas);

            Assert.IsNotNull(model.ToList()[0].Nome);
        }


        [TestMethod]
        public void Mapeamento_Loja_View_para_Dominio_esta_correto()
        {
            var expectedTelefone = new Telefone() { Numero = "98765432" };

            var lojavm = new LojaVM
            {
                Cnpj = "123123",
                Telefones = new List<TelefoneVM>()
                            {
                                new TelefoneVM() { Numero = "98765432" },
                                new TelefoneVM() { Numero = "89898982" }
                            },
                Enderecos = new List<EnderecoVM>
                            {
                                new EnderecoVM() { Bairro = "a", Cep = "123", Cidade = "b", EnderecoId = 1, Estado = "aa", Numero = "123", PessoaId = 1, Rua = "asdasdd" }
                            },
                PorcentagemFaturamento = 5,
                Nome = "Fulano",
                PessoaLojaResponsaveis = new List<PessoaLojaResponsavelVM>
                {
                    new PessoaLojaResponsavelVM 
                    { 
                        NomeResponsavel = "Djair",
                        EmailResponsavel = "deja@ir.com",
                        TelefonesResponsavel = new List<TelefoneVM>()
                                    {
                                        new TelefoneVM() { Numero = "11111111" },
                                        new TelefoneVM() { Numero = "22222222" }
                                    } 
                    }
                }
                

            };

            Mapper.CreateMap<TelefoneVM, Telefone>();
            Mapper.CreateMap<EnderecoVM, Endereco>();
            

            // Usado na área de registro
            Mapper.CreateMap<LojaVM, Loja>()
               .ForMember(x => x.PessoaJuridica, opt => opt.MapFrom(model => model))
               .ForMember(x => x.PorcentagemFaturamento, opt => opt.MapFrom(model => model.PorcentagemFaturamento))
               .ForMember(x => x.DiasConferenciaProjeto, opt => opt.MapFrom(model => model.DiasConferenciaProjeto))
               .ForMember(x => x.DiasConfirmacaoMedidas, opt => opt.MapFrom(model => model.DiasConfirmacaoMedidas))
               .ForMember(x => x.DiasConfirmacaoMedidasConclusaoMontagem, opt => opt.MapFrom(model => model.DiasConfirmacaoMedidasConclusaoMontagem))
               .ForMember(x => x.EmailNotificacoes, opt => opt.MapFrom(model => model.EmailNotificacoes));;

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

            //Usado nas controllers
            Loja loja = Mapper.Map<LojaVM, Loja>(lojavm);

            Assert.IsNotNull(loja.PessoaJuridica.Cnpj);
        }
    }
}
