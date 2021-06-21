defmodule Biblo.Repo.Migrations.CreateCopiesTable do
  @moduledoc false

  use Ecto.Migration

  def change do
    create table :copies do
      add :copy_code, :string
      add :book_id, references(:books, type: :binary_id)

      timestamps()
    end

    create unique_index(:copies, [:copy_code, :book_id])
  end
end
