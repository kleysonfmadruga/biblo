defmodule Biblo.Repo.Migrations.CreateUsersTable do
  @moduledoc false

  use Ecto.Migration

  def change do
    create table :users do
      add :cpf, :string
      add :name, :string
      add :email, :string
      add :password_hash, :string

      timestamps()
    end

    create unique_index(:users, [:cpf])
    create unique_index(:users, [:email])
  end
end
