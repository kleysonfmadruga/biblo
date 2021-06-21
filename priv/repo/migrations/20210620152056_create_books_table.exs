defmodule Biblo.Repo.Migrations.CreateBooksTable do
  @moduledoc false

  use Ecto.Migration

  def change do
    create table :books do
      add :isbn, :string
      add :title, :string
      add :year, :string
      add :author, :string
      add :edition, :string

      timestamps()
    end

    create unique_index(:books, [:isbn])
  end
end
