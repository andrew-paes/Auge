using System;
using System.Data.Entity;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Threading;
using Auge.Model.Common;
using Auge.Model.Entities;
using Auge.Repository.Models.Mapping;
using System.Data.Entity.ModelConfiguration.Conventions;

namespace Auge.Repository.Context
{
    [DbConfigurationType(typeof(MySql.Data.Entity.MySqlEFConfiguration))]
    public class AugeContext : DbContext
    {
        static AugeContext()
        {
            Database.SetInitializer<AugeContext>(null);
        }

        public AugeContext()
            : base("name=AugeDBMysql")
        {
        }

        public virtual DbSet<Pessoa> Pessoas { get; set; }
        public virtual DbSet<Telefone> Telefones { get; set; }
        public virtual DbSet<Endereco> Enderecos { get; set; }
        public virtual DbSet<PessoaFisica> PessoasFisicas { get; set; }
        public virtual DbSet<PessoaJuridica> PessoasJuridicas { get; set; }
        public virtual DbSet<Ambiente> Ambientes { get; set; }
        public virtual DbSet<AmbientePergunta> AmbientePerguntas { get; set; }
        public virtual DbSet<Cliente> Clientes { get; set; }
        public virtual DbSet<Etapa> Etapas { get; set; }
        public virtual DbSet<FluxoEtapa> FluxoEtapas { get; set; }
        public virtual DbSet<GrupoUsuario> GruposUsuarios { get; set; }
        public virtual DbSet<HistoricoProjeto> HistoricoProjetos { get; set; }
        public virtual DbSet<Loja> Lojas { get; set; }
        public virtual DbSet<Pergunta> Perguntas { get; set; }
        public virtual DbSet<Projeto> Projetos { get; set; }
        public virtual DbSet<ProjetoAmbiente> ProjetoAmbientes { get; set; }
        public virtual DbSet<ProjetoAmbienteAnexo> ProjetoAmbientesAnexos { get; set; }
        public virtual DbSet<ProjetoPerguntaResposta> ProjetoAmbientesPerguntasRespostas { get; set; }
        public virtual DbSet<RespostaPergunta> RespostasPerguntas { get; set; }
        public virtual DbSet<TipoResposta> TiposRespostas { get; set; }
        public virtual DbSet<Usuario> Usuarios { get; set; }
        public virtual DbSet<UsuarioGrupo> UsuariosGrupos { get; set; }
        public virtual DbSet<UsuarioLoja> UsuariosLojas { get; set; }
        public virtual DbSet<PessoaLojaResponsavel> PessoaLojaResponsaveis { get; set; }


        protected override void OnModelCreating(DbModelBuilder modelBuilder)
        {

            modelBuilder.Configurations.Add(new PessoaMap());
            modelBuilder.Configurations.Add(new TelefoneMap());
            modelBuilder.Configurations.Add(new EnderecoMap());
            modelBuilder.Configurations.Add(new PessoaFisicaMap());
            modelBuilder.Configurations.Add(new PessoaJuridicaMap());
            modelBuilder.Configurations.Add(new AmbienteMap());
            modelBuilder.Configurations.Add(new AmbientePerguntaMap());
            modelBuilder.Configurations.Add(new ClienteMap());
            modelBuilder.Configurations.Add(new EtapaMap());
            modelBuilder.Configurations.Add(new FluxoEtapaMap());
            modelBuilder.Configurations.Add(new GrupoUsuarioMap());
            modelBuilder.Configurations.Add(new HistoricoProjetoMap());
            modelBuilder.Configurations.Add(new LojaMap());
            modelBuilder.Configurations.Add(new PessoaLojaResponsavelMap());
            modelBuilder.Configurations.Add(new PerguntaMap());
            modelBuilder.Configurations.Add(new ProjetoMap());
            modelBuilder.Configurations.Add(new ProjetoAmbienteMap());
            modelBuilder.Configurations.Add(new ProjetoAmbienteAnexoMap());
            modelBuilder.Configurations.Add(new ProjetoPerguntaRespostaMap());
            modelBuilder.Configurations.Add(new RespostaPerguntaMap());
            modelBuilder.Configurations.Add(new TipoRespostaMap());
            modelBuilder.Configurations.Add(new UsuarioMap());
            modelBuilder.Configurations.Add(new UsuarioGrupoMap());
            modelBuilder.Configurations.Add(new UsuarioLojaMap());

            //Remove o plural das futuras tabelas
            modelBuilder.Conventions.Remove<PluralizingTableNameConvention>();

            // Não deixa remover de 1 para muitos
            modelBuilder.Conventions.Remove<OneToManyCascadeDeleteConvention>();

            // Não deixa remover de uma relação de muitos para muitos
            modelBuilder.Conventions.Remove<ManyToManyCascadeDeleteConvention>();

            // Quando for encontrado uma propriedade do mesmo nome da classe seguido de Id, é uma chave
            modelBuilder.Properties().Where(p => p.Name == p.ReflectedType.Name + "Id").Configure(c => c.IsKey());

            // Todo tipo string será criado como varchar
            modelBuilder.Properties<string>().Configure(p => p.HasColumnType("varchar"));

            // Todo tipo string será criado como o tamanho default de 100
            modelBuilder.Properties<string>().Configure(p => p.HasMaxLength(100));
        }

    }
}
